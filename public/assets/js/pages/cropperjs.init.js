!function(e){var t={};function o(n){if(t[n])return t[n].exports;var a=t[n]={i:n,l:!1,exports:{}};return e[n].call(a.exports,a,a.exports,o),a.l=!0,a.exports}o.m=e,o.c=t,o.d=function(e,t,n){o.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:n})},o.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},o.t=function(e,t){if(1&t&&(e=o(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var n=Object.create(null);if(o.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var a in e)o.d(n,a,function(t){return e[t]}.bind(null,a));return n},o.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return o.d(t,"a",t),t},o.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},o.p="/",o(o.s=12)}({12:function(e,t,o){e.exports=o(13)},13:function(e,t){function o(e){return(o="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}window.onload=function(){"use strict";var e,t=window.Cropper,n=window.URL||window.webkitURL,a=document.querySelector(".img-container").getElementsByTagName("img").item(0),r=document.getElementById("download"),d=document.getElementById("actions"),i=document.getElementById("dataX"),c=document.getElementById("dataY"),l=document.getElementById("dataHeight"),s=document.getElementById("dataWidth"),u=document.getElementById("dataRotate"),p=document.getElementById("dataScaleX"),m=document.getElementById("dataScaleY"),g={aspectRatio:16/9,preview:".img-preview",ready:function(e){console.log(e.type)},cropstart:function(e){console.log(e.type,e.detail.action)},cropmove:function(e){console.log(e.type,e.detail.action)},cropend:function(e){console.log(e.type,e.detail.action)},crop:function(e){var t=e.detail;console.log(e.type),i.value=Math.round(t.x),c.value=Math.round(t.y),l.value=Math.round(t.height),s.value=Math.round(t.width),u.value=void 0!==t.rotate?t.rotate:"",p.value=void 0!==t.scaleX?t.scaleX:"",m.value=void 0!==t.scaleY?t.scaleY:""},zoom:function(e){console.log(e.type,e.detail.scale)}},f=new t(a,g),y=a.src,v="image/jpeg",b="cropped.jpg";$('[data-toggle="tooltip"]').tooltip(),document.createElement("canvas").getContext||$('button[data-method="getCroppedCanvas"]').prop("disabled",!0),void 0===document.createElement("cropper").style.transition&&($('button[data-method="rotate"]').prop("disabled",!0),$('button[data-method="scale"]').prop("disabled",!0)),void 0===r.download&&(r.className+=" disabled",r.title="Your browser does not support download"),d.querySelector(".docs-toggles").onchange=function(e){var o,n,r,d,i=e||window.event,c=i.target||i.srcElement;f&&("label"===c.tagName.toLowerCase()&&(c=c.querySelector("input")),r="checkbox"===c.type,d="radio"===c.type,(r||d)&&(r?(g[c.name]=c.checked,o=f.getCropBoxData(),n=f.getCanvasData(),g.ready=function(){console.log("ready"),f.setCropBoxData(o).setCanvasData(n)}):(g[c.name]=c.value,g.ready=function(){console.log("ready")}),f.destroy(),f=new t(a,g)))},d.querySelector(".docs-buttons").onclick=function(t){var d,i,c,l=t||window.event,s=l.target||l.srcElement;if(f){for(;s!==this&&!s.getAttribute("data-method");)s=s.parentNode;if(!(s===this||s.disabled||-1<s.className.indexOf("disabled"))&&(c={method:s.getAttribute("data-method"),target:s.getAttribute("data-target"),option:s.getAttribute("data-option")||void 0,secondOption:s.getAttribute("data-second-option")||void 0},f.cropped,c.method)){if(void 0!==c.target&&(i=document.querySelector(c.target),!s.hasAttribute("data-option")&&c.target&&i))try{c.option=JSON.parse(i.value)}catch(l){console.log(l.message)}switch(c.method){case"getCroppedCanvas":try{c.option=JSON.parse(c.option)}catch(l){console.log(l.message)}"image/jpeg"===v&&(c.option||(c.option={}),c.option.fillColor="#fff")}switch(d=f[c.method](c.option,c.secondOption),c.method){case"scaleX":case"scaleY":s.setAttribute("data-option",-c.option);break;case"getCroppedCanvas":d&&($("#getCroppedCanvasModal").modal().find(".modal-body").html(d),r.disabled||(r.download=b,r.href=d.toDataURL(v)));break;case"destroy":f=null,e&&(n.revokeObjectURL(e),e="",a.src=y)}if("object"==o(d)&&d!==f&&i)try{i.value=JSON.stringify(d)}catch(l){console.log(l.message)}}}},document.body.onkeydown=function(e){var t=e||window.event;if(t.target===this&&f&&!(300<this.scrollTop))switch(t.keyCode){case 37:t.preventDefault(),f.move(-1,0);break;case 38:t.preventDefault(),f.move(0,-1);break;case 39:t.preventDefault(),f.move(1,0);break;case 40:t.preventDefault(),f.move(0,1)}};var h=document.getElementById("inputImage");n?h.onchange=function(){var o,r=this.files;f&&r&&r.length&&(o=r[0],/^image\/\w+/.test(o.type)?(v=o.type,b=o.name,e&&n.revokeObjectURL(e),a.src=e=n.createObjectURL(o),f.destroy(),f=new t(a,g),h.value=null):window.alert("Please choose an image file."))}:(h.disabled=!0,h.parentNode.className+=" disabled")}}});