function Point(data) {
    this.description = ko.observable(data.description);
    this.id = data.id;
}

function TaskListViewModel(todoId) {
    // Data
    var self = this;
    self.points = ko.observableArray([]);
    self.newPointText = ko.observable();
    self.toRemove = ko.observableArray([]);
    // Operations

    self.getPoints = function() {
        $.getJSON("/points/get/" + todoId, function (allData) {
            var mappedPoints = $.map(allData, function (item) {
                return new Point(item)
            });
            self.points(mappedPoints);
        });
    };

    self.addPoint = function () {
        self.points.push(new Point({description: self.newPointText()}));
        self.newPointText("");
    };
    self.removePoint = function (point) {
        self.toRemove.push(point.id);
        self.points.remove(point);
    };

    self.getPoints();

    self.save = function () {
        $.ajax("/points/save/", {
            data: ko.toJSON({points: self.points, remove: self.toRemove, todoId: todoId}),
            type: "post", contentType: "application/json",
            success: function (result) {
                self.getPoints();
            }
        });
    };
}
