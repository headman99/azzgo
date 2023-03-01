export function getNumber() {
    return 'xyxx-yxxx-yxxx'.replace(/[xy]/g, function(c) {
      var r = Math.random() * 16 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
      return v.toString(16);
    });
  }


export function compressImage(src, newX, newY) {
return new Promise((res, rej) => {
    const img = new Image();
    img.src = src;
    img.onload = () => {
    const elem = document.createElement('canvas');
    elem.width = newX;
    elem.height = newY;
    const ctx = elem.getContext('2d');
    ctx.drawImage(img, 0, 0, newX, newY);
    const data = ctx.canvas.toDataURL();
    res(data);
    }
    img.onerror = error => rej(error);
})
}
