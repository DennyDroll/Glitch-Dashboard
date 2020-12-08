$(document).ready(function()
{

    function RessourceSelection()
    {
        document.getElementById("sidebar").classList.toggle("show");
    }
    function changeName()
    {
        var skillsSelect = document.getElementById("sel_committee");
        var selectedText = skillsSelect.options[skillsSelect.selectedIndex].text;
        document.getElementById("com_sel_button").innerHTML = selectedText;
    }

    $(document).ready(function(){

        $("#get_committee").click(function(){
            var comid = $(this).val();

            $.ajax({
                url: 'getUser.php',
                type: 'post',
                data: {committee:comid},
                dataType: 'json',
                success:function(response){

                    var len = response.length;

                    $("#sel_user").empty();
                    for( var i = 0; i<len; i++){
                        globalUID = response[i]['id'];
                        var name = response[i]['name'];
                        
                        $("#sel_user").append("<option value='"+globalUID+"'>"+name+"</option>");

                    }
                }
            });
        });

        

    });


    // Time and Date
    $(document).ready(function() {
        var today = new Date();
        var dd = String(today.getDate());
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        switch (dd) 
        { 
            case "1": dd="1st ";break
            case "2": dd="2nd ";break
            case "3": dd="3rd ";break
            default: 
                dd= dd +"th ";
                break
        }
        var month ="";
        switch(mm)
        {
            case "01": month = "January"; break;
            case "02": month = "February";break;
            case "03": month = "March"; break;
            case "04": month = "April";break;
            case "05": month = "May"; break;
            case "06": month = "June"; break;
            case "07": month = "July"; break;
            case "08": month = "August"; break;
            case "09": month = "September"; break;
            case "10": month = "October"; break;
            case "11": month = "November"; break;
            case "12": month = "December"; break;
        }
        document.getElementById("date").innerHTML = dd+month;
        document.getElementById("time").innerHTML = today.getHours() + ":" + today.getMinutes();

    });

    $(document).ready(function () {
        $("#extendBtn").click(function () {
            if ($(this).data('name') == 'show') {
                $("#sidebar").animate({
                    width: '50px'
                })
                $(".content").animate({
                    width: '90%'
                })
                $(".BtnText").hide();
                $(this).data('name', 'hide')
            } else {
                $("#sidebar").animate({
                    width: '250px'
                }).show()
                $(".content").animate({
                    width: '80%'
                })
                $(".BtnText")
                .delay(300)
                .queue(function(next) {
                    $(this).css('display','inline');
                    next();
                });
                $(this).data('name', 'show')
            }
        });
    });



var clndr = [];   

    $( function() {

        var events = [ ];
        
       clndr = $('#calendar').clndr({
            template: $('#full-clndr-template').html(),
            weekOffset: 1,
            daysOfTheWeek: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],  
            
            
            
            dateParameter: 'date',


            events: events,
            eventsThisMonth: [ ],
            adjacentDaysChangeMonth: true,
        });
        GetTrelloEvents();
        
    });

    function GetTrelloEvents()
    {

        var data =[];
        var trelloApiUrl = "https://api.trello.com/1/";
        var apiKey;
        var apiToken;
        var boardId;

        $.ajax({                                      
            url: 'getApiKey.php',    
            method: "POST",
            data: 
            {
                ApiToken: 'APITOKEN',
                ApiKey: 'APIKEY',

            },
            dataType: 'json', 
            success: function (data) 
            {
                apiKey = data[0].APIKEY;
                apiToken = data[0].APITOKEN;
                boardId = data[0].BoardID;
                console.log(apiKey);
                console.log(apiToken);
                console.log(boardId);
                
                var getInfos = function(boardId){
                    var url = trelloApiUrl + "boards/" + boardId + "/lists?key=" + apiKey + "&token=" + apiToken;
                    $.ajax({
                    type: "GET",
                    url: url,
                    success: function(data) {
                        getCards(data[0].id);
                    },
                    error: function(data) {
                        console.log('Lists not found');
                    }
                    });
                }
        
                var getCards = function(listId) {
                    var getCardsUrl = trelloApiUrl + "lists/" + listId + "/cards?key=" + apiKey+ "&token=" + apiToken;
                    $.ajax({
                    type: "GET",
                    async: false,
                    url: getCardsUrl,
                    success: function(data) {
                        fillList(data);
                    },
                    error: function(data) {
                        console.log('Cards not found');
                    }
                    });
                }
                
                var fillList = function(cards) {
                    for (var i = 0; i < cards.length; i++ )
                    {
                        var events = 
                        [{
                            date: moment(cards[i].due).format('YYYY-MM-DD') ,
                            title: cards[i].name
                        }];
                        clndr.addEvents(events);
                    }
                }
                getInfos(boardId);

            },
            error: function () 
            {
                console.log("There was an error! Check your Token and try again later!");
            }
        });
    }
    
    
    
})