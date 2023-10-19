const D_NONE = 'd-none';

function showRelatedTasks(projectId = 0) {
    const rows = document.querySelectorAll('tbody tr');

    rows.forEach((row) => {
        const project = row.getAttribute('data-project-id');
        if (project == projectId) {
            row.classList.remove(D_NONE);
        } else {
            row.classList.add(D_NONE);
        }
    });
}

function arrangePriorityArray(specificTaskId) {
    const prepareData = [];
    const priorities = [];
    
    const rows = document.querySelectorAll('tbody tr');

    rows.forEach((row) => {
        const taskId = row.getAttribute('data-task-id');
        const priority = row.getAttribute('data-priority');
        const hidden = Array.from(row.classList).includes(D_NONE);

        // we just need to know the changes made to tasks related to a selected project
        if (priority !== null && !hidden) {
            prepareData.push({taskId, priority});
        }
    });

    prepareData.forEach((data, index) => {
        const taskId = data.taskId;
        let priority = Number(data.priority);
        if (taskId == specificTaskId) {
            priority = index == 0 ? 1 : Number(prepareData[index-1].priority) + 1;

            const rowTask = document.getElementById(`task_${taskId}`);
            rowTask.setAttribute('data-priority', priority);
            const task_name = rowTask.getAttribute('data-task-name');
            const project = rowTask.getAttribute('data-project-id');

            const rowPriority = document.getElementById(`priority_${taskId}`);
            rowPriority.innerHTML = priority;

            priorities.push({taskId, task_name, project, priority});
        }
    });

    return priorities;
}

function rqUpdatePriority(requestData) {
    const taskId = requestData[0].taskId;
    
    fetch(`/api/sort/taskPriority/${taskId}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(requestData[0]),
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        // Handle the data from the response
        console.log(data);
    })
}

(function() {
    const selectElement = document.getElementById('project-id');
    selectElement.addEventListener('change', function() {
        const selectedValue = selectElement.value;
        showRelatedTasks(selectedValue);
    });

    $(".sort").sortable({
        items: "tr",
        cursor: "move",
        opacity: 0.6,
        update: function(event, elem) {
            // const sortOrderTaskId = $(this).sortable('toArray', { attribute: 'data-task-id' });
            const taskId = elem.item.attr('data-task-id');
            const dataArray = arrangePriorityArray(taskId);
            
            rqUpdatePriority(dataArray);
        }
    });
})();
