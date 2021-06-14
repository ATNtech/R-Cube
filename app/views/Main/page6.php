<div class="col-12">
    <h4>Атлас профессий</h4>
    <div id="chartdiv"></div>
</div>


<!-- Styles -->
<style>
    #chartdiv {
        width: 100%;
        height: 550px;
        max-width: 100%;
    }
</style>

<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/plugins/forceDirected.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

<!-- Chart code -->
<script>
    am4core.ready(function() {

        // Themes begin
        am4core.useTheme(am4themes_animated);
        // Themes end



        var chart = am4core.create("chartdiv", am4plugins_forceDirected.ForceDirectedTree);
        var networkSeries = chart.series.push(new am4plugins_forceDirected.ForceDirectedSeries())

        chart.data = [{
    name: "Java программист (middle)",
    children: [
      {
        name: "Java SE",
        children: [
          { name: "JDBC", value: 100 },
          { name: "Java Core", value: 60 }
        ]
      },
      {
        name: "Java EE",
        children: [
          { name: "JPA", value: 135 },
          { name: "JSP", value: 98 }
        ]
      },
      {
        name: "Web Frameworks",
        children: [
          {
            name: "Spring",
            children: [
              { name: "Spring ", value: 130 },
              { name: "Spring Boot", value: 87 },
              { name: "Restful Services", value: 55 }
            ]
          },
          { name: "JSF", value: 148 },
          {
            name: "AJAX", children: [
              { name: "Facelets", value: 53 },
              { name: "MVC", value: 30 }
            ]
          },
          { name: "Maven", value: 26 }
        ]
      },
      {
        name: "Grails",
        children: [
          { name: "Groovy", value: 415 },
          { name: "GSP", value: 148 },
          { name: "GORM", value: 89 }
        ]
      },
      {
        name: "Google",
        children: [
          {
            name: "GWT",
            children: [
              { name: "AdSense", value: 33 },
              { name: "Google Big Table", value: 40 },
              { name: "Adwords", value: 89 }
            ]
          },
          {
            name: "Mail",
            value: 148
          }
        ]
      }

    ]
  }];

        networkSeries.dataFields.value = "value";
        networkSeries.dataFields.name = "name";
        networkSeries.dataFields.children = "children";
        networkSeries.nodes.template.tooltipText = "{name}:{value}";
        networkSeries.nodes.template.fillOpacity = 1;

        networkSeries.nodes.template.label.text = "{name}"
        networkSeries.fontSize = 10;

        networkSeries.links.template.strokeWidth = 1;

        var hoverState = networkSeries.links.template.states.create("hover");
        hoverState.properties.strokeWidth = 3;
        hoverState.properties.strokeOpacity = 1;

        networkSeries.nodes.template.events.on("over", function(event) {
            event.target.dataItem.childLinks.each(function(link) {
                link.isHover = true;
            })
            if (event.target.dataItem.parentLink) {
                event.target.dataItem.parentLink.isHover = true;
            }

        })

        networkSeries.nodes.template.events.on("out", function(event) {
            event.target.dataItem.childLinks.each(function(link) {
                link.isHover = false;
            })
            if (event.target.dataItem.parentLink) {
                event.target.dataItem.parentLink.isHover = false;
            }
        })

    }); // end am4core.ready()
</script>