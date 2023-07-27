const isInViewport = (el) => {
    return el.getBoundingClientRect().top <= (window.innerHeight - 480 || document.documentElement.clientHeight);
}
export { isInViewport }