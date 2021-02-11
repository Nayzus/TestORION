
window.onload = function () {

    let item = document.getElementsByClassName('item');

    document.querySelectorAll(".card")
        .forEach(el => el.addEventListener("click",  function(e){

            let id = this.getAttribute('data-id');
            let key = parseInt(this.getAttribute('key'), 10 );
            let width = window.screen.width;
            let toString = 3;

            if(width <= 575) {
                toString = 1
            }
            else if (width <= 991) {
                toString = 2;
            }

            let line = key/toString;

            let video = document.querySelectorAll('.video');
            video.forEach( e => e.remove() );


                let html = '    <div class="video">\n' +
                    '                <div>\n' +
                    '                    <span id="close">Закрыть</span><iframe src="https://oldonline3.orionnet.online/cam'+ id +'/embed.html" frameborder="0" allowfullscreen width="100%" id="iframe"></iframe>\n' +
                    '                </div>\n' +
                    '            </div>'


                if (toString === 1) {
                    this.parentElement.insertAdjacentHTML('afterend',html);
                }
                else {
                    let numItem = Math.ceil(line) * toString - 1;
                    item[numItem].insertAdjacentHTML('afterend', html);
                }

                document.getElementById('close').addEventListener('click', function () {
                    let video = document.querySelectorAll('.video');
                    video.forEach( e => e.remove() );
                })


        }));




}
