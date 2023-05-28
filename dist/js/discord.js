(function( discord, $, undefined ) {

discord.togglJoinDiscord = function() {
   var container = document.getElementById("discordIframeContainer");

   if(!container) {
      var htmlIframeString = `
         <div id="discordIframeContainer" class="discordIframe-container fade-in">
            <iframe src="https://discordapp.com/widget?id=912833248856514560&theme=dark" width="350" height="500" allowtransparency="true" frameborder="0" sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts"></iframe>
         </div>
      `;

      createDiv(htmlIframeString);
      container = document.getElementById("discordIframeContainer");
   }

   if(container.style.display === "none" || container.style.display === '') {
      setDisplay(container, "block");
   }
   else {
      setDisplay(container, "none");
   }
}

function setDisplay(ele, style) {
   ele.style.display = style
}

function createDiv(html) {
   var newDiv = document.createElement('div');
   $(newDiv).html(html);
   document.body.appendChild(newDiv);
}

discord.init = function() {
   var htmlBubbleString = `
      <div id="discordBubbleContainer" class="discord-container">
         <div class="talk-bubble tri-right border btm-right-in">
            <img src="https://egj.vreezy.de/wp-content/uploads/2022/06/Discord-Logo-Color-1.png" class="rotating" style="padding: 20px;">
         </div>   
      </div>`;

   createDiv(htmlBubbleString);

   const container = document.getElementById("discordBubbleContainer");
   container.addEventListener('click', event => {
      discord.togglJoinDiscord();
   });

}

}( window.discord = window.discord || {}, jQuery ));

discord.init();