<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<script>
    function markAsRead(id, url) {
        fetch(`/notifications/${id}/read`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            }
        }).then(() => {
            if (url && url !== '#') {
                window.location.href = url;
            } else {
                window.location.reload();
            }
        }).catch(err => {
            console.error('Error marking notification as read:', err);
            window.location.reload();
        });
    }
</script>
