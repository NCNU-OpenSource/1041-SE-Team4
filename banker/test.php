<style type="text/css">
#Box1{
    width:200px;
    height:100px;
    padding:10px;
    border:1px #ccc dashed;
    float:left;
    margin-right:10px;
}
</style>
<script type="text/javascript">
function a(){
	
}
function AllowDrop(event){
    event.preventDefault();
}
function Drag(event){
    event.dataTransfer.setData("text",event.currentTarget.id);
}
function Drop(event){
    event.preventDefault();
	
    var data=event.dataTransfer.getData("text");
	/*
    event.currentTarget.appendChild(document.getElementById(data));
	*/
	alert(data);
}
</script>
<img id="box1" src="oven.jpg" ondrop="Drop(event)" ondragover="AllowDrop(event)"></div>
<img id="Img1" src="1.jpg" draggable="true" ondragstart="Drag(event)">
<div style="clear:both;"></div>