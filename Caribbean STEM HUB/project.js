// JavaScript for Project Filtering
document.getElementById('subject-filter').addEventListener('change', function () {
    const selectedSubject = this.value;

    // Hide all project items
    document.querySelectorAll('.project-item').forEach(function (project) {
        project.style.display = 'none';
    });

    // Show project items matching the selected subject or show all if "All Subjects" is selected
    if (selectedSubject === 'all') {
        document.querySelectorAll('.project-item').forEach(function (project) {
            project.style.display = 'block';
        });
    } else {
        document.querySelectorAll(`.project-item[data-subjects*="${selectedSubject}"]`).forEach(function (project) {
            project.style.display = 'block';
        });
    }
});