const movies = Array.from(document.querySelectorAll('.movie'));
const categories = new Set();

const btnCategory = document.getElementById('showCat');
btnCategory.onclick = showByCategory;

movies.forEach(movie => {
    const movieCategories = movie.getAttribute('data-categories').split(' ');
    movieCategories.forEach(cat => cat ? categories.add(cat) : null);
});

movies.forEach(m => m.addEventListener('click', goToVideo));

function goToVideo(ev) {
    const id = ev.target.getAttribute('data-id');
    
    const form = document.createElement('form');
    form.action = window.location.origin + '/video/watch.php';
    form.method = 'GET';

    const input = document.createElement('input');
    input.type = 'text';
    input.name = 'cod';
    input.value = id;

    form.appendChild(input);

    document.body.appendChild(form);
    form.submit();
}

function showByCategory() {
    categories.forEach(showSection);
    document
        .querySelector('.general')
        .style.display = 'none';
}

function showSection(cat) {
    const html =
        `
        <div class="${cat}">
            <h2>${cat}</h2>
            <section class="movies">
                ${moviesByCat(cat)}
            </section>
        </div>
        `;

    document
        .querySelector('main')
        .insertAdjacentHTML('beforeend', html);

    document
        .querySelectorAll('.movie')
        .forEach(m => m.addEventListener('click', goToVideo));

    btnCategory.innerText = 'Mostrar general';
    btnCategory.onclick = showAll;
}

function moviesByCat(cat) {
    const html =
        movies
        .filter(m => {
            const cats = m.getAttribute('data-categories').split(' ');
            return cats.includes(cat);
        })
        .reduce((pre, m) => pre + m.outerHTML, "");

    return html;
}

function showAll() {
    [...document.querySelectorAll('main div')]
        .filter(section => !section.classList.contains('general'))
        .forEach(el => document.querySelector('main').removeChild(el));

    document
        .querySelector('.general')
        .style.display = 'block';

    btnCategory.innerText = 'Mostrar por categoría';
    btnCategory.onclick = showByCategory;
}