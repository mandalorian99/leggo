	//fetching data from thingspeak api using fetch api AIzaSyACQNPDXK2BP0OQsmSFBZqMtQpE8Ph9Vkw
	function fetch_data_from_api(){

		console.log('function evoked...')
		// Replace ./data.json with your JSON feed
		fetch('https://api.thingspeak.com/channels/684398/feeds.json?api_key=87F2N6QMW3SJKO5G&results=52').then(response => {
 			 return response.json();
		}).then(data => {
 			 // Work with JSON data here
 			 //console.log(data.feeds[0]['field1']);
 			 for(let i=3 ;i<52;i++){
 			 	//console.log(data.feeds[i]['field1']+','+ data.feeds[i]['field2'] );
 			 	if(data.feeds[i]['field1'] != null && data.feeds[i]['field2']!=null)
 			 		var marker = L.marker([data.feeds[i]['field1'], data.feeds[i]['field2']]).addTo(mymap).bindPopup('lant:'+data.feeds[i]['field1']+' , long: '+data.feeds[i]['field2']).openPopup();
 			 }
 			 				console.log('circling..')
 			 //adding polyline 
 			 var latlangs = [
    							[26.92339459 , 75.74867956],
    							[26.92375955 , 75.7492462],
    							[26.92373954 , 75.75052901],
    							[26.92378689 , 75.75184075],
    							[26.92391821 ,  75.75250699],
    							[26.92449864 ,  75.75262323],
    							[26.92420778 , 75.75319691]
			 				] ;

 			 var polyline = L.polyline(latlangs , {color:'red'}).addTo(mymap);

	



		});

		//setTimeout(fetch_data_from_api, 5000);
	}//EOF

	function route(){
		var marker = L.marker([26.9124 , 75.7873]).addTo(mymap);
		var marker2 = L.marker([26.92516321 , 75.75461675]).addTo(mymap);

	}
	var mymap = L.map('mapid').setView([26.9124, 75.7873], 13);
	// open stree map url -https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png
	L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
    	maxZoom: 21,
    	id: 'mapbox.streets',
    	accessToken: 'pk.eyJ1IjoibWFoZW5kcmFjaG91ZGhhcnkiLCJhIjoiY2pyOHdldHRkMDB0cTQ5bmt5ZmtmcGhkdCJ9.ELcQW-I7rlh75ZUF9sFChg'
	}).addTo(mymap);
