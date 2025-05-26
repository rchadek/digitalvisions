document.addEventListener("DOMContentLoaded", function () {
    console.log("DOM loaded");
  
    window.addEventListener("load", function () {
      gsap.to(".my-element", {
        rotation: 360,
        duration: 2,
        ease: "bounce.out",
      });
  
      console.log("window loaded");
    });
  });
  