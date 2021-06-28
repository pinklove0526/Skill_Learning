<?php
include 'includes/header.php'
?>

<style>
    @import url('https://fonts.googleapis.com/css?family=Roboto');
    /*font-family: 'Roboto', sans-serif;*/
    @import url('https://fonts.googleapis.com/css?family=Open+Sans');
    /*font-family: 'Open Sans', sans-serif;*/
    @import url('https://fonts.googleapis.com/css?family=Encode+Sans+Condensed');
    /*font-family: 'Encode Sans Condensed', sans-serif;*/

.wrapper{
	width: 45%;
	border: 1px solid #bfbfbf;
	margin: 5% 25%;
	box-shadow: 0px 5px 10px 5px rgba(0,0,0,0.5);
	
}

.lii{
	list-style-image: url(https://klocksnack.se/stylses/baisik/pen.png);
	padding-bottom: 5%;
}

h3{
	font-family: 'Open Sans', sans-serif;
	font-size: 100%;
	padding: 0 0 2% 3%;
}

header{
	background-color: #d8d8d8;
	text-align: center;
	padding: 2% 2%;
	font-size: 170%;
    font-family: 'Roboto', sans-serif;
    color: #7109ce;
}

#add-classroom{
	padding: 5% ;
	margin: 0 7%;
	width: 90%;
}



#hide{
	margin: 15px 0px; ;
	width: 20px;
}

.join{
	background: #7109ce;
	color: white;
	float: right;
	padding: 1% 1%;
	cursor: pointer;
	margin-right: 2%;
	font-family: 'Roboto', sans-serif;
	font-size: 100%;
}
.name{
	padding-left:30px;
}

input[type = text]{


}

button{
	background: #7109ce;
	color: white;
	padding:1%;
	font-family: 'Roboto', sans-serif;
	border: solid 1px #7109ce;
	font-size: 100%; 
}

@media screen and (max-width: 768px){
  
  .wrapper{
	width: 85%;
	border: 1px solid #bfbfbf;
	margin: 10% 5%;
	box-shadow: 0px 5px 10px 5px rgba(0,0,0,0.5);
	}
  
  li{
    padding-bottom:4%;
    font-size:100%;
  }
  
  h3{
	font-family: 'Open Sans', sans-serif;
	font-size: 90%;
	padding: 0 0 2% 3%;
}
  
 header{
	text-align: center;
	padding: 2% 2%;
	font-size: 140%;
} 
.join{
    
    float: right;
	padding: 1% 1%;
	cursor: pointer;
	margin-right: 2%;
}
  
  
  
  #add-classroom{
	padding: 2% 0 10% 10% ;
	width: 80%;
  
}
 
 #hide{
	margin: 20px 0px;
	width: 20px;
   
}
  
}
li{
     list-style: none;
}

@media screen and (max-width: 420px){
  #add-classroom{
    width:70%;
    padding-left:20%;
  }
}
</style>


<div class="wrapper">
	<header><h1>Classroom list</h1>
		<form id="search-classrooms">
	<input type="text" placeholder="Search classrooms">
</form>
	</header>
	

	<div id="classroom-content">
		<h3></h3>
	<ul>
		<li class="lii">
		<span class="name">Programming</span>

        <a href="#">
            <span class="join">Join</span>
        </a>
        
		
		</li>
		<li class="lii">
		<span class="name">Computer network !!!</span>
		<span class="join">Join</span>
		</li>
		<li class="lii">
		<span class="name">Cooking</span>
		<span class="join">Join</span>
		</li>
		<li class="lii">
		<span class="name">Photoshop</span>
		<span class="join">Join</span>
		</li>
	</ul>
   </div>
	<form id="add-classroom">
	   <input type="checkbox" id="hide" />
        <label for="hide">Hide all classrooms</label>
		<input type="text" placeholder="Add your classroom...">
		<button>Add</button>
	</form>
</div>

<script>
  const list = document.querySelector("#classroom-content ul");
const forms = document.forms;

// join classrooms
list.addEventListener("click", (e) => {
//   if (e.target.className == "join") {
//     const li = e.target.parentElement;
//     li.parentNode.removeChild(li);
//   }
});

// add classrooms
const addForm = forms["add-classroom"];
addForm.addEventListener("submit", function (e) {
  e.preventDefault();

  // create elements
  const value = addForm.querySelector('input[type="text"]').value;
  const li = document.createElement("li");
  const bookName = document.createElement("span");
  const joinBtn = document.createElement("span");

  // add text content
  bookName.textContent = value;
  joinBtn.textContent = "join";

  //add classes

  bookName.classList.add("name");
  joinBtn.classList.add("join");

  // append to DOM
  li.appendChild(bookName);
  li.appendChild(joinBtn);
  list.appendChild(li);
  //list.insertBefore(li, list.querySelector('li:first-child'));
});

//hide classrooms

const hideBox = document.querySelector("#hide");

hideBox.addEventListener("change", function (e) {
  if (hideBox.checked) {
    list.style.display = "none";
  } else {
    list.style.display = "block";
  }
});

// filter classrooms

const searchbar = document.forms["search-classrooms"].querySelector("input");
searchbar.addEventListener("keyup", function (e) {
  const term = e.target.value.toLowerCase();

  const classrooms = list.getElementsByTagName("li");
  Array.from(classrooms).forEach(function (classroom) {
    const title = classroom.firstElementChild.textContent;
    if (title.toLowerCase().indexOf(term) != -1) {
      classroom.style.display = "block";
    } else {
      classroom.style.display = "none";
    }
  });
});

</script>

<?php
include 'includes/footer.php'
?>
