    function vectorMap(){
        $('#map').vectorMap({
                map: 'cn_mill_en',
                scaleColors: ['#C8EEFF', '#0071A4'],
                normalizeFunction: 'polynomial',
                hoverOpacity: 0.7,
                hoverColor: false,
                zoomOnScroll: false,
                regionStyle: {
                    initial: {
                        fill: '#9f9f9f',
                        "fill-opacity": 0.9,
                        stroke: '#fff',
                    },
                    hover: {
                        "fill-opacity": 0.7
                    },
                    selected: {
                        fill: '#1A94E0'
                    }
                },
                markerStyle: {
                    initial: {
                        fill: '#e04a1a',
                        stroke: '#FF604F',
                        "fill-opacity": 0.5,
                        "stroke-width": 1,
                        "stroke-opacity": 0.4,
                    },
                    hover: {
                        stroke: '#C54638',
                        "stroke-width": 2
                    },
                    selected: {
                        fill: '#C54638'
                    },
                },
                // markerStyle: {
                //   initial: {
                //     fill: '#F8E23B',
                //     stroke: '#ffffff'
                //   }
                // },
                onRegionOver: function (event, code) {
                    //sample to interact with map
                    if (code == 'CN-50') {
                        event.preventDefault();
                        console.log("ddd");
                    }
                    // if(code !=""){
                    //     alert("code="+code);
                    //     console.log(event);
                    // }
                },
                onRegionClick: function (element, code, region) {
                    //sample to interact with map
                    var message = 'You clicked "' + region + '" which has the code: ' + code.toUpperCase();
                    console.log(element);
                    alert(message);
                },
                onRegionTipShow: function(e, el, code){
                  //el.html(el.html()+' (GDP - '+code.toUpperCase()+')');
                  alert("dd");
                },
                backgroundColor: '#f1f4f9',
                markers: [
                    {
                        latLng: [31.2989740,120.5852970],
                        name:'Suzhou',
                    },
                    {
                        latLng: [39.9042110,116.4073950],
                        name: 'Beijing',
                    },
                    {
                        latLng: [31.215307,121.449767],
                        name: 'Shanghai',
                        //set up color
                        //style: {fill:'blue'}
                    },
                    {
                        latLng: [39.965384,116.495059],
                        name :'清华大学第一附属医院',             
                    },
                    {
                        latLng:[29.817833,106.400739],
                        name: 'Chongqing',
                    },
                    {
                        latLng: [34.32746,108.939566],
                        name: 'shanxi'
                    },
                    {
                        latLng: [36.28922,103.759231],
                        name: '甘肃'
                    }
                ]
            });
}
$(function(){
    vectorMap();
});