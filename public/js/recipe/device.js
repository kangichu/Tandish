/*document.addEventListener("DOMContentLoaded", initDetect)

function initDetect(){
  window.addEventListener("resize", detectDevice)
  detectDevice()
}

detectDevice = () => {
  let detectDeviceObj = {
    device : /Android|webOS|iPhone|iPad|iPod/i.test(navigator.userAgent),
    orientation: !navigator.maxTouchPoints ? 'desktop' : !window.screen.orientation.angle ? 'portrait' : 'landscape'
  }

  updateText(detectDeviceObj)
}

updateText = (detectDeviceObj) => {
  
  let div = document.createElement('div');
  div.id = 'content';
  div.class = 'note';


  let h2 = document.createElement('h2');
  h2.textContent = `Unfortunately this is not responsive on ${detectDeviceObj.device} devices`
  div.appendChild(h2);

  // add div to the document
  document.body.appendChild(div);
  
}*/