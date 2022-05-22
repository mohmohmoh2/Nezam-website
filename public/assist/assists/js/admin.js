


    let dele = document.querySelectorAll(".dele");

dele.forEach(e => {
    e.addEventListener('click' , function(event) {
        event.preventDefault();
        //create overlay element
        let overlay = document.createElement("div");

        //Add class name to overlay
        overlay.className = 'popup-overlay';

        //Append To the body
        document.body.appendChild(overlay);

        //create popup element
        let popupBox = document.createElement("div");

        //Add class name to popup
        popupBox.className = 'popup-box';

        //Create Heading TO Popup
        let textb = document.createElement("h3");

        //Add class name to overlay
        textb.className = 'mb-4';

        // Create Text ToHeading
        let imgText = document.createTextNode("Do You Want To Delete This");

        // Append The Text To Heading
        textb.appendChild(imgText);

        // Append The Heading To Popup Box
        popupBox.appendChild(textb);

        // Create Text

        // Create Yes Button
        let ybtn = document.createElement("a");

        //Add class name to the yes button
        ybtn.className = 'btn btn-danger m-2';

        // Create Text ToHeading
        let ytext = document.createTextNode("Yes");

        // Append The Text To Heading
        ybtn.appendChild(ytext);

        // Append The Popup Box To Body
        popupBox.appendChild(ybtn);

        // Create No Button
        let nbtn = document.createElement("a");

        //Add class name to the no button
        nbtn.className = 'close-button btn btn-primary m-2';

        //Set Image Source
        ybtn.href = e.getAttribute("href");

        // Create Text ToHeading
        let ntext = document.createTextNode("No");

        // Append The Text To Heading
        nbtn.appendChild(ntext);

        // Append The Popup Box To Body
        popupBox.appendChild(nbtn);

        // Append The Popup Box To Body
        overlay.appendChild(popupBox);

        
    });
});

let cdele = document.querySelectorAll(".cdele");

cdele.forEach(e => {
    e.addEventListener('click' , function(event) {
        event.preventDefault();
        //create overlay element
        let overlay = document.createElement("div");

        //Add class name to overlay
        overlay.className = 'popup-overlay';

        //Append To the body
        document.body.appendChild(overlay);

        //create popup element
        let popupBox = document.createElement("div");

        //Add class name to popup
        popupBox.className = 'popup-box';

        //Create Heading TO Popup
        let textb = document.createElement("h3");

        //Add class name to overlay
        textb.className = 'mb-4';

        // Create Text ToHeading
        let imgText = document.createTextNode("Do You Want To Delete This");

        // Append The Text To Heading
        textb.appendChild(imgText);

        // Append The Heading To Popup Box
        popupBox.appendChild(textb);

        // Create Text

        // Create Yes Button
        let ybtn = document.createElement("a");

        //Add class name to the yes button
        ybtn.className = 'btn btn-danger m-2';

        // Create Text ToHeading
        let ytext = document.createTextNode("Yes");

        // Append The Text To Heading
        ybtn.appendChild(ytext);

        // Append The Popup Box To Body
        popupBox.appendChild(ybtn);

        // Create No Button
        let nbtn = document.createElement("a");

        //Add class name to the no button
        nbtn.className = 'close-button btn btn-primary m-2';

        //Set Image Source
        ybtn.href = e.getAttribute("href");

        // Create Text ToHeading
        let ntext = document.createTextNode("No");

        // Append The Text To Heading
        nbtn.appendChild(ntext);

        // Append The Popup Box To Body
        popupBox.appendChild(nbtn);

        // Append The Popup Box To Body
        overlay.appendChild(popupBox);

        
    });
});

let adele = document.querySelectorAll(".adele");

adele.forEach(e => {
    e.addEventListener('click' , function(event) {
        event.preventDefault();
        //create overlay element
        let overlay = document.createElement("div");

        //Add class name to overlay
        overlay.className = 'popup-overlay';

        //Append To the body
        document.body.appendChild(overlay);

        //create popup element
        let popupBox = document.createElement("div");

        //Add class name to popup
        popupBox.className = 'popup-box';

        //Create Heading TO Popup
        let textb = document.createElement("h3");

        //Add class name to overlay
        textb.className = 'mb-4';

        // Create Text ToHeading
        let imgText = document.createTextNode("Do You Want To Delete This");

        // Append The Text To Heading
        textb.appendChild(imgText);

        // Append The Heading To Popup Box
        popupBox.appendChild(textb);

        // Create Text

        // Create Yes Button
        let ybtn = document.createElement("a");

        //Add class name to the yes button
        ybtn.className = 'btn btn-danger m-2';

        // Create Text ToHeading
        let ytext = document.createTextNode("Yes");

        // Append The Text To Heading
        ybtn.appendChild(ytext);

        // Append The Popup Box To Body
        popupBox.appendChild(ybtn);

        // Create No Button
        let nbtn = document.createElement("a");

        //Add class name to the no button
        nbtn.className = 'close-button btn btn-primary m-2';

        //Set Image Source
        ybtn.href = e.getAttribute("href");

        // Create Text ToHeading
        let ntext = document.createTextNode("No");

        // Append The Text To Heading
        nbtn.appendChild(ntext);

        // Append The Popup Box To Body
        popupBox.appendChild(nbtn);

        // Append The Popup Box To Body
        overlay.appendChild(popupBox);

        
    });
});




// Close Popup Box
document.addEventListener("click", function (e) {
    if (e.target.className == 'close-button btn btn-primary m-2') {
    //Remove Popup Box
    e.target.parentNode.remove();
    // Remove OverLay
    document.querySelector(".popup-overlay").remove();
    } 
});

