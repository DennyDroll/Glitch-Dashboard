$(document).ready(LinkButtons);

function LinkButtons()
{
    $('.calendarBtn').click(function()
    {
        window.location='/calendar.php';
    });
    $('.linkBtn').click(function()
    {
        window.location='/connections.php';
    });
}