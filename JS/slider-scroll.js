document.addEventListener('DOMContentLoaded', sliderAPI);

function sliderAPI(){
  var slider = new Slider();
  if (!slider.isStart()){
    slider.rotateImage();
}
  document.getElementById('left').addEventListener('click',
        function  (){
          slider.setWay('left');
          slider.checkNowPosXScroll();
          if (slider.getPosX() == 0 || slider.isActive()){
            return;
          }
        slider.run();
        },
        'false'
        );
  document.getElementById('right').addEventListener('click',
    function  (){
      slider.setWay('right');
      slider.checkNowPosXScroll();
      if (slider.isMaxPosX () || slider.isActive()){
        return;
      }
      slider.run();
    },
    'false'
    );
}
function Slider(){
      this.way = '';
      this.isRun = false;
      this.startAPP = false;
      this.dsdd = false;
      this.posScroll = 0;
      this.domSlider = document.getElementById('slider');
      this.domImageSliderShow = document.getElementById('image_show');
      this.domImageSliderGroup = document.getElementById('image_group').childNodes;
      this.currentScrollX = 10;
      this.currentFrame = 0;
      this.maxFrame = 30;
      this.posX = this.domSlider.scrollLeft;
      this.id;
      this.node = this.domImageSliderGroup.item(0).firstChild;
      this.nodeID = 0;
      this.maxPosX = 0;
      this.maxRectLeft = this.domSlider.clientWidth/2+60;
      this.lifeSpanAPI = 0;
      this.animationFrame = window.requestAnimationFrame || window.mozRequestAnimationFrame ||
                              window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;
      this.isStart = function (){
                return this.startAPP;
              };
      this.checkNowPosXScroll = function (){
                this.posX  = this.domSlider.scrollLeft;
              };
      this.setWay = function(whichWay){
                this.way = whichWay;
              };
      this.setStartIdImg = function (id){
                this.idImg = id;
              };
      this.run = function (){
                    this.isRun = true;
                  if (this.way == 'left'){
                    this.renderLeft();
                  }
                  else if (this.way == 'right'){
                  this.renderRight();
                  }
              };
        this.rotateImage = function(){
                if (!this.startAPP){
                  this.showImg();
                }
                this.createEvents();
              };

        this.createEvents = function (){
                console.log("Why u dont do this? :(")
                var nodes = this.domImageSliderGroup;
              console.log(this.domSlider);
              var nodes =this.domImageSliderGroup;
              nodes.forEach(
                  node => {
                            node.addEventListener(
                              'click',
                              () => {
                                if (this.StartAPP){
                                  return;
                                }

                                this.node = node.firstChild;
                                this.nodeID = node.firstChild.id;
                                this.startAPP = true;
                                this.showImg();
                                this.whichWay(node);
                                this.run();

                              }
                            )

                        }
              );

            };
        this.showImg = function(){
        var node = this.domImageSliderGroup.item(this.nodeID);
        var image = new Image (400,300);
        image.src = node.firstChild.src;
        if (!this.startAPP){
        this.domImageSliderShow.appendChild(image);
        }
        else{
              this.domImageSliderShow.classList.add("animate_opacity");
              this.activeAnimate = true;
              window.setTimeout(
                ()=>{
                  this.domImageSliderShow.removeChild(this.domImageSliderShow.firstChild);
                  this.domImageSliderShow.appendChild(image);
                },
                500
              );
              window.setTimeout(
                ()=>{
                    this.activeAnimate = false;
                    this.domImageSliderShow.classList.remove("animate_opacity");
                }
                , 1000
              );
            }
          };
      this.calculateMaxPosX = function (){
        this.maxPosX =  this.domSlider.scrollWidth - this.domSlider.clientWidth;
      };
    this.renderLeft = function(){
      console.log("LOL2");
      if (this.startAPP){
          if (this.isMaxRect() || this.isLifeSpanAPITooLong() ){
            this.stopAPP();
            return;
          }
        this.scrollLeft();
        ++this.lifeSpanAPI;
        window.requestAnimationFrame(()=>{this.renderLeft();});
        return;
        }
      else if (this.isMaxCurrentFrame() || this.isZeroPosX()){
        this.stopAPP();
        return;
      }
      this.scrollLeft();
        window.requestAnimationFrame(()=>{this.renderLeft();});
    };
    this.renderRight = function(){
      console.log("LOl1");
      if (this.startAPP){
          if (this.isMaxRect() || this.isLifeSpanAPITooLong()){
            this.stopAPP();
            return;
          }
        this.scrollRight();
        ++this.lifeSpanAPI;
        window.requestAnimationFrame(() =>{this.renderRight();});
        return;
      }
      if (this.isMaxCurrentFrame() || this.isMaxPosX() ){
        this.stopAPP();
        return;
      }
      this.scrollRight();
      window.requestAnimationFrame(()=>{this.renderRight();});

    };

    this.stopAPP = function(){
      clearInterval(this.id);
      this.currentFrame = 0;
      this.isRun = false;
      this.startAPP = false;
      this.lifeSpanAPI = 0;
    };

    this.scrollRight = function(){
      this.currentScrollX = this.domSlider.scrollLeft + 10;
      this.domSlider.scrollLeft = this.currentScrollX;
      this.posX = this.domSlider.scrollLeft;
      ++this.currentFrame;
    };

    this.scrollLeft = function(){
      this.currentScrollX = this.domSlider.scrollLeft - 10;
      this.domSlider.scrollLeft = this.currentScrollX;
      this.posX = this.domSlider.scrollLeft;
      ++this.currentFrame;
    };

    this.isZeroPosX = function(){
      if (this.posX == 0 ) return true; else return false;
    };
    this.isMaxCurrentFrame = function(){
      if (this.maxFrame == this.currentFrame) return true; else return false;
    };

    this.isMaxPosX = function() {
      this.calculateMaxPosX();
      if (this.posX == this.maxPosX) return true; else return false;
    };
    this.isActive = function (){
      return this.isRun;
    };
    this.getPosX = function(){
      return this.posX;
    };
    this.whichWay = function(node){
      console.log(node.getBoundingClientRect());
      var rect = node.getBoundingClientRect();
      if (rect.left > this.maxRectLeft || this.isZeroPosX()){
        this.way = 'right';
      }
      else {
        this.way='left';
      }
    };
    this.isMaxRect = function(){
      var rectNode = this.node.getBoundingClientRect();
        if (this.way =='right'){
          return this.isMaxRectRight(rectNode);
        }
        else if (this.way == 'left'){
          return this.isMaxRectLeft(rectNode);
        }

    };
    this.isMaxRectRight = function(rectNode){
      if (rectNode.left <= this.maxRectLeft) return true; else return false;
    }
    this.isMaxRectLeft = function(rectNode){
        if (rectNode.left >= this.maxRectLeft) return true; else return false;
    };
    this.isLifeSpanAPITooLong = function(){
      if (this.lifeSpanAPI == 20){
        return true;
      }
      return false;
    };
}
