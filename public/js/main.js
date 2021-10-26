$(".table").DataTable();


//get semesters per year
function getSemester(id) {
    axios.get('/get/semester/' + id)
        .then((response) => {
            let semesters = "";
            let data = response.data;
            $.each(data, function (key, value) {
                semesters = semesters + '<option value="' + value.id + '">' + value.semester + '</option>'
            });
            $("#semesters").html(semesters);
        })
        .catch((error) => {
            console.log(error);
        })
}