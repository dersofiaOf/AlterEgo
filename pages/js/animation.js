function onEntry(entry) {
    entry.forEach(change => {
      if (change.isIntersecting) {
        change.target.classList.add('appear');
      }
    });
  }

  let options = {
    threshold: [0.5] //  Элементы появляются, когда 50% их высоты видно
  };

  let observer = new IntersectionObserver(onEntry, options);
  let elements = document.querySelectorAll('.fade-in');

  for (let elm of elements) {
    observer.observe(elm);
  }