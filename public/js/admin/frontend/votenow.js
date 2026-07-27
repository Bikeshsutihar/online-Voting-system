document.addEventListener('click', function(e) {
    if (e.target.classList.contains('vote-btn')) {
        const btn = e.target;
        const id = btn.dataset.id;
        const voteCount = document.getElementById('voteCount-' + id);

        if (btn.disabled) return;
        btn.disabled = true; // disable immediately so it can't be double-clicked during the request

        fetch('/vote/' + id, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            },
        })
        .then(res => res.json().then(data => ({ status: res.status, body: data })))
        .then(({ status, body }) => {
            if (status === 200 && body.success) {
                voteCount.textContent = body.votes_count;
                btn.textContent = 'Done';
                btn.classList.remove('bg-green-500');
                btn.classList.add('bg-red-500', 'cursor-not-allowed');
            } else {
                alert(body.message || 'Something went wrong.');
                btn.disabled = false;
            }
        })
        .catch(() => {
            alert('Network error — please try again.');
            btn.disabled = false;
        });
    }
});
