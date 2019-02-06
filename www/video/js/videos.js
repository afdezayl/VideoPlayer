const movies = Array.from(document.querySelectorAll('.movie'));
const categories = new Set();

const btnCategory = document.getElementById('showCat');
btnCategory.onclick = showByCategory;

movies.forEach(movie => {
    const movieCategories = movie.getAttribute('data-categories').split(' ');
    movieCategories.forEach(cat => cat ? categories.add(cat) : null);
});

document
    .querySelectorAll('.movieInfo button')
    .forEach(m => m.addEventListener('click', goToVideo));

const inputTitulo = document.getElementById('title');
inputTitulo.addEventListener('input', filterVideos);

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
        .querySelector('.GENERAL')
        .style.display = 'none';
}

function showSection(cat) {
    const html =
        `
        <div class="${cat} category">
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

    btnCategory.innerText = 'General';
    btnCategory.className = 'mdi mdi-24px mdi-light mdi-filter-remove-outline btn';
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
    [...document.querySelectorAll('main>div.category')]
        .filter(section => !section.classList.contains('GENERAL'))
        .forEach(el => document.querySelector('main').removeChild(el));

    document
        .querySelector('.GENERAL')
        .style.display = 'block';

    btnCategory.innerText = 'Categorías';
    btnCategory.className = 'mdi mdi-24px mdi-light mdi-filter-outline btn';
    btnCategory.onclick = showByCategory;
}

function filterVideos(ev) {
    const text = this.value.toUpperCase();
    const moviesBox = [...document.querySelectorAll('.movie')];
    moviesBox.forEach(movie => movie.classList.remove('hidden'));

    if(!text.length) {
        return;
    }    

    moviesBox   
        .filter(movie => {
            const titulo = movie.getAttribute('data-title');
            return !titulo.includes(text, 0);
        })
        .forEach(movie => movie.classList.add('hidden'));

}