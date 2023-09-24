const forumContent = document.getElementById('forum-content');
const usernameInput = document.getElementById('username');
const locationInput = document.getElementById('location');
const questionInput = document.getElementById('question');
const postButton = document.getElementById('post');

postButton.addEventListener('click', postQuestion);

function postQuestion() {
    const username = usernameInput.value;
    const location = locationInput.value;
    const question = questionInput.value;

    if (!username || !location || !question) {
        alert('Please fill all fields.');
        return;
    }

    const formData = new FormData();
    formData.append('username', username);
    formData.append('location', location);
    formData.append('question', question);

    // Send data to server using AJAX
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'post_question.php', true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Refresh forum content
            getForumContent();
            // Clear input fields
            usernameInput.value = '';
            locationInput.value = '';
            questionInput.value = '';
        }
    };
    xhr.send(formData);
}

function getForumContent() {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'get_forum.php', true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            forumContent.innerHTML = xhr.responseText;
        }
    };
    xhr.send();
}

// Load initial forum content
getForumContent();
