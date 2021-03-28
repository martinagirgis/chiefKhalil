(function() {
$(document).ready(function () {
    loadCoursesUi();
});
}());






   function loadCoursesUi()
    {
    var cats=[];
    let uniqueCats=[];
    var courses = JSON.parse(sessionStorage.getItem("courseData"));
    courses.forEach(function(item){
    cats.push(item.data.category);
    });
    uniqueCats=removeDup(cats);
    console.log(uniqueCats);
    uniqueCats.forEach(function(item){
        $("#coursesCateList").append(`<a href="#" data-filter="#`+item+`">`+item+`</a>`);
        courses.forEach(function(course){
            if(course.data.category==item) {
                $("#coursesCards").append(`<div id="`+item+`" class="col-xl-4 col-sm-6">

                <div class="vertical-item text-center bordered">
                    <div class="item-media">
                        <img src="images/gallery/01.jpg" alt="">
                        
                    </div>
                    <div class="item-content">
                        <div class="small-text tag color-main">
                            <a href="course_detail.html?`+course.id+`">`+item+`</a>
                        </div>
                        <h5>
                        <a href="course_detail.html?`+course.id+`">`+course.data.title+`</a>
                        </h5>
                        <a <a href="chief-single.html?`+course.data.instractorId+`">`+getInstructor(course.data.instractorId)+` <i class="fa fa-user-circle-o text-success" aria-hidden="true"></i></a>
                        <br><br>
                        <a href="course_detail.html?`+course.id+`" class="btn btn-maincolor">عرض التفاصيل</a>
                    </div>
                </div>

            </div>` );
            }
        });
    });
//     $("#coursesList").empty();
//     uniqueCats.forEach(function( item,index ){
//     $("#coursesList").append(`<li><a href="javascript:void(0)">`+item+`</a><ul id="cate`+index+`"></ul></li>`);
//     console.log(item);
//     courses.forEach(function(course,courseIndex ){
//     if(course.data.category==item) {
//         $( "#cate" + index ).append( `<li><a href="course_detail.html?`+course.id+`">` + course.data.title + `</a>` );
//     }
//     });
//  });
}


function removeDup(items) {
    let unique = {};
    items.forEach(function(i) {
     if(!unique[i]) {
      unique[i] = true;
     }
    });
    return Object.keys(unique);
   }


   function getInstructor(id){
    var data = sessionStorage.getItem("chefsData");
        var chefDetails = JSON.parse(data);
        var name = ""
        for (index = 0; index < chefDetails.length; index++) {
            if(chefDetails[index].id==id){
                name =  chefDetails[index].data.firstName +" "+chefDetails[index].data.lastName; 
                break;
            }
        }
        return name;	
}
