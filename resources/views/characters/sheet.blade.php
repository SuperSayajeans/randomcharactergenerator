<body style = "background-color:#F2B06E">
<div id="rectangle" style="width:880px; height:150px; border-style: solid; border-color: #924DCD; float: right">
<div style="height:20px; border-style: solid; border-color: #924DCD; color: #924DCD; text-align: center; font-size: 15px; font-family: verdana;"> 
</div>
<div style="color: #924DCD; font-size: 20px; font-family: verdana;"><form>
  Commentary:<br>
  <input type="text" name="firstname" size="121"><br>
</form>
</div>
</div>
<div id="rectangle" style="width:880px; height:150px; border-style: solid; border-color: #924DCD">
<!--<div style="width:435px; height:69px; border-style: solid; border-color: #924DCD; color: #924DCD; text-align: center; line-height: 70px; font-size: 30px; font-family: verdana; float: right;"> </div>
<div style="width:435px; height:69px; border-style: solid; border-color: #924DCD; color: #924DCD; text-align: center; line-height: 70px; font-size: 30px; font-family: verdana;"></div>
<div style="width:435px; height:69px; border-style: solid; border-color: #924DCD; color: #924DCD; text-align: center; line-height: 70px; font-size: 30px; font-family: verdana; float: right;"> </div>
<div style="width:435px; height:69px; border-style: solid; border-color: #924DCD; color: #924DCD; text-align: center; line-height: 70px; font-size: 30px; font-family: verdana;"></div> -->
Name: {{ $data->char_name }}
<br>
Race: 
@if($data->race==1)
Humano
@endif
@if($data->race==2)
Anão
@endif
@if($data->race==3)
Elfo
@endif
@if($data->race==4)
Orc
@endif
@if($data->race==5)
Hobbit
@endif
<br>
Gender: {{ $data->sex }}
<br>
Creator: {{ $data->name }}
</div>

<br>

<div id="rectangle" style="width:100%; height:250px; border-style: solid; border-color: #924DCD;">
<img src="http://i.imgur.com/u5dLCOC.pngC" alt="Images" height="100%" width="100%">
</div>

<h2 style="color: #924DCD; text-align: center; font-family: verdana;"> Características </h2>

<div id="rectangle" style="width:100%; height:200px; border-style: solid; border-color: #924DCD">
<div style="width:50%; height:100%; border-style: solid; border-color: #924DCD; color: #924DCD; text-align: center; line-height: 70px; font-size: 30px; font-family: verdana; float: right;"> Social<br>
<img src="http://i.imgur.com/8ZPsHfi.png" alt="Images">
<img src="http://i.imgur.com/8ZPsHfi.png" alt="Images">
<img src="http://i.imgur.com/8ZPsHfi.png" alt="Images">
<img src="http://i.imgur.com/8ZPsHfi.png" alt="Images">
<img src="http://i.imgur.com/8ZPsHfi.png" alt="Images">
</div>
<div style="width:50%; height:100%; border-style: solid; border-color: #924DCD; color: #924DCD; text-align: center; line-height: 70px; font-size: 30px; font-family: verdana;"> Pessoal<br>
<img src="http://i.imgur.com/8ZPsHfi.png" alt="Images">
<img src="http://i.imgur.com/8ZPsHfi.png" alt="Images">
<img src="http://i.imgur.com/8ZPsHfi.png" alt="Images">
<img src="http://i.imgur.com/8ZPsHfi.png" alt="Images">
<img src="http://i.imgur.com/8ZPsHfi.png" alt="Images">

</div>
</div>