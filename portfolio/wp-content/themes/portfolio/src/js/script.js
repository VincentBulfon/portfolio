import mouse from "./mouse";
import Element from "./Element";
//import { App } from "./App";

let core = {
  width: null,
  body: null,
  stop: false,
  maxSkewX: 3,
  maxSkewY: 3,
  containers: ["hero__wrapper--landing"],
  detectionElements: [],
  elements: [],
  mouse,
  Element,

  init() {
    this.onResize(); // get widow width
    this.update(); // set update on screen refresh rate
    this.mouse.mouseMove();
    window.addEventListener("resize", this.onResize.bind(this));
    this.getContainers();
    this.createElementData();
    for (let i = 0; i < this.elements.length; i++) {
      this.elements[i].init();
    }
    //this.detectWebGLContext();
  },

  createElementData() {
    for (let i = 0; i < this.detectionElements.length; i++) {
      this.elements.push(
        new Element(
          this.detectionElements[0],
          this.mouse,
          this.maxSkewX,
          this.maxSkewY
        )
      );
    }
  },

  getContainers() {
    for (let i = 0; i < this.containers.length; i++) {
      let elt = document.querySelectorAll("." + this.containers[i]);
      if (elt != null) {
        for (let j = 0; j < elt.length; j++) {
          this.detectionElements.push(elt[j]);
        }
      }
    }
  },

  onResize() {
    this.width = window.innerWidth;
    this.elements.forEach((elt) => {
      elt.init();
    });
  },

  update() {
    let myReq = window.requestAnimationFrame(this.update.bind(this)); //can be done with arrow function inted of bind method
    if (this.stop === true) {
      window.cancelAnimationFrame(myReq);
    }
    this.elements.forEach((elt) => {
      elt.update();
    });
  },
  //detect if webgl is supported
  /*detectWebGLContext(elmnts) {
    // Create canvas element. The canvas is not added to the
    // document itself, so it is never displayed in the
    // browser window.
    const canvas = document.createElement("canvas");
    // Get WebGLRenderingContext from canvas element.
    let gl =
      canvas.getContext("webgl") || canvas.getContext("experimental-webgl");
    // Report the result.
    if (gl && gl instanceof WebGLRenderingContext) {
      let elmnts = [];
      let images = [];
      let parent = null;
      document.querySelectorAll(".card__image").forEach((elmnt) => {
        elmnts.push(elmnt);
        images.push(elmnt.src);
      });
      if (document.getElementsByClassName("projects")) {
        parent = document.getElementsByClassName("projects");
        console.log("exec");
        const myApp = new App(elmnts, images, parent);
        if (module && module.hot) {
          module.hot.dispose(() => {
            if (myApp) myApp.dispose();
          });
        }
      } else if (document.getElementsByClassName("header--project")) {
        parent = document.getElementsByClassName("header__project");
        const myApp = new App(elmnts, images, parent);

        if (module && module.hot) {
          module.hot.dispose(() => {
            if (myApp) myApp.dispose();
          });
        }
      }
    }
  },*/
};

window.addEventListener("load", () => {
  core.init();
});
