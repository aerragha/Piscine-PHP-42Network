local = window.localStorage;
todos = local.getItem('list') ? local.getItem('list').split(',') : [];

function isEmpty(str)
{
    return (str.length == 0 || !str.trim());
}

function fill(tab)
{
    str = '<h1 id="title">To do list</h1>';
    tab.forEach(function(elem){
        str = str + '<div class="todo">' + elem + '</div>';
    });
    $("#ft_list").html(str + '<button id="new" name="new">New</button>');
}

fill(todos);

$("#new").click(function(){
    todo = prompt("Fill To-do");
    if (!isEmpty(todo))
    {
        $("#title").after('<div class="todo">' + todo + '</div>');
        todos.unshift(todo);
        local.setItem('list', todos);
    }
});

$("#ft_list").click(function(e){
    if (e.target.classList.contains('todo'))
    {
        if (confirm('Are you sure you want to delete "' + e.target.textContent + '" ?'))
        {
            todos.forEach(function(elem, i, tab){
                elem == e.target.textContent ? tab.splice(i, 1) : 1;
            });
            local.setItem('list', todos);
            e.target.remove();
        }
    }
});