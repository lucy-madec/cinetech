document.querySelectorAll('.reply-link').forEach(link => {
    link.addEventListener('click', function(e) {
        e.preventDefault();
        const commentId = this.getAttribute('data-comment-id');
        const replyForm = document.getElementById('reply-form-container');
        replyForm.style.display = 'block';
        replyForm.querySelector('#reply-parent-id').value = commentId;

        this.closest('.comment').appendChild(replyForm);
    });
});    