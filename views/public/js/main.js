const togle1 = document.querySelector('.containernewleson');
const togle2 = document.querySelector('.containerleson');
const btnne = document.querySelector('.btn-newleson');
const btnlist = document.querySelector('.btn-newlist');

btnne.addEventListener('click', () => {
    togle1.classList.add('active');
    togle2.classList.remove('active');
});
btnlist.addEventListener('click', () => {
    togle2.classList.add('active');
    togle1.classList.remove('active');
});
