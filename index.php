<!DOCTYPE html>
<html lang="en">

<head>
    <title> Find Average Color of image via JavaScript.</title>
    <style>
        #img {
            position: absolute;
            top: 20%;
            left: 25%;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <!-- <img height="100px" width="150px" id="img" src="1.jpg"> -->
    <img height="100px" width="150px" id="img" src="3.jpg">
    <!-- <img height="100px" width="150px" id="img" src="2.png"> -->
    <!-- <img height="100px" width="150px" id="img" src="4.jpg"> -->

    <script>
        function averageColor(imageElement) {
            var canvas = document.createElement('canvas'),
                context = canvas.getContext && canvas.getContext('2d'),
                imgData, width, height, length, count = 0,
                rgb = {
                    r: 0,
                    g: 0,
                    b: 0
                };
            height = canvas.height = imageElement.naturalHeight || imageElement.offsetHeight | imageElement.height;
            width = canvas.width = imageElement.naturalWidth || imageElement.offsetWidth || imageElement.width;
            context.drawImage(imageElement, 0, 0);
            imgData = context.getImageData(0, 0, width, height);
            length = imgData.data.length;

            for (var i = 0; i < length; i += 4) {
                rgb.r += imgData.data[i];
                rgb.g += imgData.data[i + 1];
                rgb.b += imgData.data[i + 2];
                count++;
            }
            rgb.r = Math.floor(rgb.r / count);
            rgb.g = Math.floor(rgb.g / count);
            rgb.b = Math.floor(rgb.b / count);
            return rgb;
        }
        var rgb;
        rgb = averageColor(document.getElementById('img'));
        rgb = 'rgb(' + rgb.r + ',' + rgb.g + ',' + rgb.b + ')';
        $('body').css('background-color', rgb);
    </script>
</body>

</html>