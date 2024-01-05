<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Cricket Score</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <!-- <h1 class="mb-4">Live Cricket Score</h1> -->
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Match: Team A vs Team B</h5>
            <p class="card-text">Current Score: <span id="liveScore"><?php echo getLiveScore(); ?></span></p>
        </div>
    </div>
</div>

<!-- Bootstrap JS and Popper.js (required for Bootstrap) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

<!-- Your custom JavaScript for updating the live score -->
<script>
    // Function to update the live score using JSON data
    function updateLiveScore() {
        // Fetch JSON data from the server
        fetch('http://localhost:3000/score.php')
            .then(response => response.json())
            .then(data => {
                // Update the live score with the fetched data
                document.getElementById('liveScore').textContent = data.score;
            })
            .catch(error => {
                console.error('Error fetching live score:', error);
            });
    }

    // Update the live score every 5 seconds
    setInterval(updateLiveScore, 5000);

    // Initial update when the page loads
    updateLiveScore();

    // You can include additional JavaScript logic here
</script>

<?php
// Function to get live score from a JSON API (replace 'http://localhost:3000/score.php' with the actual URL)
function getLiveScore() {
    $json_data = file_get_contents('http://localhost:3000/score.php');
    $data = json_decode($json_data, true);
    
    // Assuming the JSON structure is something like {"score": "150 for 3"}
    return $data['score'];
}
?>

</body>
</html>
