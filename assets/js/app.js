const 
	xBar = document.getElementById('x-bar'),
	bar = document.getElementById('bar'),
	nav = document.getElementById('nav-links');

	bar.addEventListener('click', ()=>{
		event.preventDefault();
		nav.classList.add('nav-links-flex');
	})



	xBar.addEventListener('click', ()=>{
		event.preventDefault();
		nav.classList.remove('nav-links-flex');
	})



const searchBtn = document.getElementById('search-btn');

searchBtn.addEventListener('click', () => {
	event.preventDefault();
});