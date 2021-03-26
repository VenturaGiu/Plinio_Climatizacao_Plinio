const go = (elem) => {
    window.scroll({
        top: document.querySelector( elem ).offsetTop, 
        left: 0, behavior: 'smooth'
    });
  }