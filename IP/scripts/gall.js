// здесь будем хранить текущее значение сдвига карусели
let xPos = 0;


// получаем свойство background-position у элемента с номером i, чтобы отрисовать картинку в нужном месте в карусели
function getBgPos(i){ 
  return ( 100-gsap.utils.wrap(0,360,gsap.getProperty('.ring', 'rotationY')-180-i*36)/360*500 )+'px 0px';
}

// основная функция, которая управляет всеми спецэффектами в карусели
gsap.timeline()
    // устанавливаем свойство rotationY, чтобы была видна только одна половина виртуального кольца с картинками
    .set('.ring', { rotationY:180, cursor:'grab' })
    
    // поворачиваем вдоль виртуального кольца каждую картинку
    .set('.img',  { 
      rotateY: (i)=> i*-36,
      transformOrigin: '50% 50% 500px',
      z: -500,
      // берём новую картинку для карусели по её индексу
      backgroundImage:(i)=>'url(../images/'+(1+ i) +'.jpg ',
      // сразу масштабируем картинки под их размер в карусели
      backgroundPosition:(i)=>getBgPos(i),
      // не показываем обратную сторону картинок
      backfaceVisibility:'hidden'
    })    
  
    // добавляем эффекты затемнения
    .add(()=>{
      // когда мышь попадает в зону карусели
      $('.img').on('mouseenter', (e)=>{
        // находим текущий элемент, на который указывает мышь
        let current = e.currentTarget;
        // затемняем всё, кроме этого элемента
        gsap.to('.img', {opacity:(i,t)=>(t==current)? 1:0.5, ease:'power3'})
      })
      // когда мышь ушла за пределы карусели
      $('.img').on('mouseleave', (e)=>{
        // убираем затемнение и эффекты со всех картинок
        gsap.to('.img', {opacity:1, ease:'power2.inOut'})
      })
    })

// когда зажата левая кнопка мыши — можно крутить карусель
$(window).on('mousedown touchstart', dragStart);
// отпускаем мышь — карусель останавливается
$(window).on('mouseup touchend', dragEnd);
      
// прокрутка карусели
function dragStart(e){ 
  // если было касание тач-интерфейса — получаем координаты касания
  if (e.touches) 
    e.clientX = e.touches[0].clientX;
  // устанавливаем новое значение сдвига карусели
  xPos = Math.round(e.clientX);
  // меняем форму курсора внутри карусели, чтобы было видно, что мышь ей управляет
  gsap.set('.ring', {cursor:'grabbing'})
  // когда мышь начнёт двигаться — запускаем функцию обработки захвата карусели
  $(window).on('mousemove touchmove', drag);
}

// функция обработки захвата карусели
function drag(e){
  // если было касание тач-интерфейса — получаем координаты касания
  if (e.touches) 
    e.clientX = e.touches[0].clientX;    
  // обрабатываем общий блок с кольцом
  gsap.to('.ring', {
    // высчитываем разницу между старым и новым положением и меняем значение свойства rotationY
    rotationY: '-=' +( (Math.round(e.clientX)-xPos)%360 ),
    // запускаем встроенную в GSAP функцию: она дождётся нового положения карусели и поменяет положения картинок в ней
    onUpdate:()=>{ gsap.set('.img', { backgroundPosition:(i)=>getBgPos(i) }) }
  });
  // устанавливаем новое значение сдвига карусели
  xPos = Math.round(e.clientX);
}

// обрабатываем конец вращения карусели
function dragEnd(e){
  // считаем новое положение карусели после того, как отпустили мышь
  $(window).off('mousemove touchmove', drag);
  // меняем форму курсора на карусели
  gsap.set('.ring', {cursor:'grab'});
}