let projects = ["Viggen Group", "SSH", "Makro", "Test"];
let description = ["Bouw", "Woningbouw", "Handel", "Test"];
let cellDescriptionTextArray;
let status = "open";
loadProjects();

function loadProjects() {
    let tbl = document.getElementById("project-body");

        for (j in description) {
            cellDescriptionTextArray = document.createTextNode(description[j]);

            console.log(cellDescriptionTextArray);
        }
        projects.forEach(function (i) {
            
            let row = document.createElement("tr");
            let cellProject = document.createElement("td");
            let cellDescription = document.createElement("td");
            let cellStatus = document.createElement("td");
            let cellButton = document.createElement("td");

            let Button = document.createElement("button");

            let cellProjectText = document.createTextNode(i);
            let cellDescriptionText = document.createTextNode(cellDescriptionTextArray);
            let cellStatusText = document.createTextNode(status);
            let cellButtonText = document.createTextNode("Check");

            cellButton.appendChild(Button);
            cellProject.appendChild(cellProjectText);
            cellDescription.appendChild(cellDescriptionText);
            cellStatus.appendChild(cellStatusText);
            Button.appendChild(cellButtonText);
            row.appendChild(cellProject);
            row.appendChild(cellDescription);
            row.appendChild(cellStatus);
            row.appendChild(cellButton);
            
            tbl.appendChild(row);
        
    });
}

function getProjectsFromDatabase() {

}
