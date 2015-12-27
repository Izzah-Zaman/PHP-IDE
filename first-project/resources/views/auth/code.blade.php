<style>
input {

  display: inline-block;
  -webkit-box-sizing: content-box;
  -moz-box-sizing: content-box;
  box-sizing: content-box;
  padding: 10px 20px;
  border: 1px solid #b7b7b7;
  -webkit-border-radius: 3px;
  border-radius: 3px;
  font: normal 16px/normal "abel", Helvetica, sans-serif;
  color: rgba(255,242,242,1);
  -o-text-overflow: clip;
  text-overflow: clip;
  background: rgb(150,150,150);
  -webkit-transition: all 200ms cubic-bezier(0.42, 0, 0.58, 1);
  -moz-transition: all 200ms cubic-bezier(0.42, 0, 0.58, 1);
  -o-transition: all 200ms cubic-bezier(0.42, 0, 0.58, 1);
  transition: all 200ms cubic-bezier(0.42, 0, 0.58, 1);


}
.inputStyle {

  display: inline-block;
  -webkit-box-sizing: content-box;
  -moz-box-sizing: content-box;
  box-sizing: content-box;
  padding: 10px 20px;
  border: 1px solid #b7b7b7;
  -webkit-border-radius: 3px;
  border-radius: 3px;
  font: normal 16px/normal "abel", Helvetica, sans-serif;
  color: rgb(100,100,100);
  -o-text-overflow: clip;
  text-overflow: clip;
  background: #ecf0f1;
  -webkit-transition: all 200ms cubic-bezier(0.42, 0, 0.58, 1);
  -moz-transition: all 200ms cubic-bezier(0.42, 0, 0.58, 1);
  -o-transition: all 200ms cubic-bezier(0.42, 0, 0.58, 1);
  transition: all 200ms cubic-bezier(0.42, 0, 0.58, 1);


}
button {
 display: inline-block;
  -webkit-box-sizing: content-box;
  -moz-box-sizing: content-box;
  box-sizing: content-box;
  cursor: pointer;
  padding: 10px 20px;
  border: none;
  -webkit-border-radius: 3px;
  border-radius: 3px;
  font: normal 16px/normal "cabin-condensed", Helvetica, sans-serif;  color: rgba(255,255,255,0.9);
  -o-text-overflow: clip;
  text-overflow: clip;
  background: rgb(100,100,100);
  -webkit-box-shadow: 2px 2px 2px 0 rgba(0,0,0,0.2) ;
  box-shadow: 2px 2px 2px 0 rgba(0,0,0,0.2) ;
  text-shadow: -1px -1px 0 rgba(15,73,168,0.66) ;
  -webkit-transition: all 300ms cubic-bezier(0.42, 0, 0.58, 1);
  -moz-transition: all 300ms cubic-bezier(0.42, 0, 0.58, 1);
  -o-transition: all 300ms cubic-bezier(0.42, 0, 0.58, 1);
  transition: all 300ms cubic-bezier(0.42, 0, 0.58, 1);

}
.page {

font: normal 20px/normal "cabin-condensed", Helvetica, sans-serif;

    background-color:rgba(249,234,234,1);
    width: 1400px;
    height: 650px;


}
.inputs{



}

</style>
<script type="text/javascript" script-name="cabin-condensed" src="http://use.edgefonts.net/cabin-condensed.js"></script>
<body class="page">



<?php  $role = Auth::user()->role;
if ($role == 'User'){

// 
    //<input type="hidden" name="_token" value="{{ csrf_token()}}"/>

	?>

<form method="POST" action="/auth/code" id="form1">
{!! csrf_field() !!}

    <div >
        
    <textarea name="code" rows="25" form="form1" cols="130" placeholder="Type php code here" value="Type php code here"class= "inputStyle"></textarea>
    <br>
    <button type="submit">Run Code</button>
  	
     
    </div>

 

</form>
<?php  
}

else{
	//
 //<input type="hidden" name="_token" value="{{ csrf_token()}}"/>

?>
<form method="POST" action="/auth/code" id="form2">
 {!! csrf_field() !!}
<button type="submit">View all codes</button>
</form>
</body>

<?php 
//echo "hello world" 
}
?>