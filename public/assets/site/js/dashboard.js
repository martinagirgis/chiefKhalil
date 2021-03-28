// var enrolment = {
//     userEmail: "martinagirgis@yahoo.com",
//     courseId: "ED265HZiQ59M66n35ner",
//     quizScore: "0",
//     startDate: "2021-01-04",
//     endDate: "0",
//     status: "stel",
// }
// addEnrollment(enrolment ,function (result) {
//     console.log("success all");
    
// },function (error) {
//     console.log("fail");
// })
const appTarget = "http://localhost/chef-khalil-school-1/current/"

async function generateCertficate(student,course){
    const { PDFDocument, StandardFonts, rgb, degrees } = PDFLib;
    // Create a new PDFDocument
    const pdfDoc = await PDFDocument.create()
    pdfDoc.registerFontkit(fontkit)
    // Embed the Times Roman font
    // const timesRomanFont = await pdfDoc.embedFont(StandardFonts.TimesRoman)
    const url = appTarget+'certificate/Tajawal-Light.ttf';
    const fontBytes = await fetch(url).then(res => res.arrayBuffer())   
    const font = await pdfDoc.embedFont(fontBytes)

        // pdfDoc.setAuthor(this.pdfInfo.author);
        // pdfDoc.setTitle(this.pdfInfo.title);
        // pdfDoc.setKeywords(this.pdfInfo.keywords.split(","));
    // Add a blank page to the document
    const page = pdfDoc.addPage()

    const imageurl = appTarget+'certificate/certificate.png';
    const pngImageBytes = await fetch(imageurl).then(res => res.arrayBuffer())    ;
    const pngImage = await pdfDoc.embedPng(pngImageBytes)

    //841.89
    //595.28
    // Get the width and height of the page
    page.setSize(841.89,595.28);
    const { width, height } = page.getSize()
    
    // Draw a string of text toward the top of the page
    const fontSize = 40;
    page.drawImage(pngImage, {
        x: 0,
        y: 0,
        width: width,
        height: height,
    })
    page.drawText(student, {
        x: width/3,
        y: 350,
        size: fontSize,
        font: font,
        color: rgb(0, 0, 0)
    })
    page.drawText(course, {
        x: (width/3)-25,
        y: 250,
        size: fontSize,
        font: font,
        color: rgb(0, 0, 0)
    })

    // Serialize the PDFDocument to bytes (a Uint8Array)
        const pdfBytes = await pdfDoc.save()


        // Trigger the browser to download the PDF document
        download(pdfBytes, "certificate.pdf", "application/pdf;charset='utf-8'");
}



function loads() {
    
    sessionStorage.getItem("email");
    findEnrollmentsByUserEmail(sessionStorage.getItem("email") ,function (result) {
        console.log(result);
        var enroll = "";
        for (let i = 0; i < result.length; i++) {
            findCourseById(result[i]["courseId"] ,function (course) {
                var dis;
                if (result[i]["status"]=="finshed") {
                    dis = "";
                } else {
                    dis = "disabled";
                }
                enroll += `<li class="bordered row">
                                <div class="col-3">
                                    <a style="margin-left: 15px;" href="training.html">
                                        <img  src="`+ course["thumb"] +`" alt="">
                                    </a>
                                </div>
                                <div class="media-body col-5">
                                    <br>
                                    <p>
                                        <a href="training.html"> `+ course["subTitle"] +`</a>
                                    </p>
                                    <p>
                                        <a href="blog-single-right.html">  </a>
                                    </p>
                                    <h6 class="item-meta">
                                        <i class="fa fa-calendar color-main"></i>
                                        `+ course["issueDate"] +`
                                    </h6>
                                </div>
                                <div class="btn-timetable col-4">
                                    <br>
                                    <input  type="submit" onclick="CID('`+ result[i]["courseId"] +`','`+ result[i]["quizScore"] +`');" class="btn btn-outline-maincolor" style="margin-bottom: 5px;" value="تكملة الدورة">
                                    <input onclick="generateCertficate('`+ sessionStorage.getItem("firstName") + `" "` +  sessionStorage.getItem("lastName") +`','`+ course["subTitle"] +`')" type="submit" `+ dis +` class="btn btn-outline-maincolor" value="تنزيل الشهادة">
                                    <br>
                                </div>
                                <br>
                            </li>
                            <br>`;
                            document.getElementById('enrolls').innerHTML = enroll;
                console.log(course); 
            },function (error) {
                console.log("fail");
            })
            
            //console.log(data[""][num][t]);
        }
        
        

    },function (error) {
        console.log("fail");
    })
    
}

function CID(cid,scoreN) {
    sessionStorage.setItem("CID",cid);
    sessionStorage.setItem("scoreN",scoreN);
    location.href = "training.html";
}

