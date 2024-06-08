function updateCountdown() {
    // Get the current date and time
    const now = new Date();

    // Get the time remaining until the next day (in milliseconds)
    const timeUntilNextDay = new Date(now.getFullYear(), now.getMonth(), now.getDate() + 1) - now;

    // Convert time to hours, minutes, seconds
    const hours = Math.floor(timeUntilNextDay / (1000 * 60 * 60));
    const minutes = Math.floor((timeUntilNextDay % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((timeUntilNextDay % (1000 * 60)) / 1000);

    // Display the countdown
    // document.getElementById("countdown").innerHTML = `Next day starts in: ${hours}h ${minutes}m ${seconds}s`;
    // console.log(hours, minutes, seconds);
    document.getElementById("hours").innerHTML = hours;
    document.getElementById("minutes").innerHTML = minutes;
    document.getElementById("seconds").innerHTML = seconds;

}

// Call updateCountdown every second
setInterval(updateCountdown, 1000);

// Initial call to set up the countdown
updateCountdown();