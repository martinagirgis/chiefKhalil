{{-- <video width="100%" height="415" controls>
    <source src="{{URL::asset('assets/site/backImages/courses/video/1.mp4')}}" type="video/mp4" > 
</video>

<video height="300px" controls> 
    <source src="../../../../public/assets/site/backImages/courses/video/2.mp4" type="video/mp4"> 
    {{-- <source src="{{URL::asset('assets/site/backImages/courses/video/2.mp4')}}" type="video/ogg"> 
      Your browser does not support the video tag.  --}}
{{-- </video> --}}


<html>
  <head>
    <meta charset="utf-8" />
    <script src="https://unpkg.com/pdf-lib@1.4.0"></script>
    <script src="https://unpkg.com/downloadjs@1.4.7"></script>
  </head>

  <body>
    <p>Click the button to embed PNG and JPEG images with <code>pdf-lib</code></p>
    <button onclick="embedImages()">Create PDF</button>
    <p class="small">(Your browser will download the resulting file)</p>
  </body>

  <script>
    const { PDFDocument } = PDFLib

    async function embedImages() {
			// Fetch JPEG image
      const jpgUrl = 'https://pdf-lib.js.org/assets/cat_riding_unicorn.jpg'
      const jpgImageBytes = await fetch(jpgUrl).then((res) => res.arrayBuffer())
      
      // Fetch PNG image
      const pngUrl = 'https://pdf-lib.js.org/assets/minions_banana_alpha.png'
      const pngImageBytes = await fetch(pngUrl).then((res) => res.arrayBuffer())

      // Create a new PDFDocument
      const pdfDoc = await PDFDocument.create()

      // Embed the JPG image bytes and PNG image bytes
      const jpgImage = await pdfDoc.embedJpg(jpgImageBytes)
      const pngImage = await pdfDoc.embedPng(pngImageBytes)

      // Get the width/height of the JPG image scaled down to 25% of its original size
      const jpgDims = jpgImage.scale(0.25)

      // Get the width/height of the PNG image scaled down to 50% of its original size
      const pngDims = pngImage.scale(0.5)

      // Add a blank page to the document
      const page = pdfDoc.addPage()

      // Draw the JPG image in the center of the page
      page.drawImage(jpgImage, {
        x: page.getWidth() / 2 - jpgDims.width / 2,
        y: page.getHeight() / 2 - jpgDims.height / 2,
        width: jpgDims.width,
        height: jpgDims.height,
      })

      // Draw the PNG image near the lower right corner of the JPG image
      page.drawImage(pngImage, {
        x: page.getWidth() / 2 - pngDims.width / 2 + 75,
        y: page.getHeight() / 2 - pngDims.height,
        width: pngDims.width,
        height: pngDims.height,
      })

      // Serialize the PDFDocument to bytes (a Uint8Array)
      const pdfBytes = await pdfDoc.save()

			// Trigger the browser to download the PDF document
      download(pdfBytes, "pdf-lib_image_embedding_example.pdf", "application/pdf");
    }
  </script>
</html>