list = document.getElementById("ft_list");
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
    list.innerHTML = str + '<button id="new" name="new">New</button>';
}

fill(todos);

document.getElementById("new").addEventListener('click', function(){
    todo = prompt("Fill To-do");
    if (!isEmpty(todo))
    {
        list.children[1].insertAdjacentHTML('beforebegin', '<div class="todo">' + todo + '</div>');
        todos.unshift(todo);
        local.setItem('list', todos);
    }
});

list.addEventListener('click', function(e){
    if (e.target.classList.contains('todo'))
    {
        if (confirm('Are you sure you want to delete "' + e.target.textContent + '" ?'))
        {
            todos.forEach(function(cur, i, tab){
                t = (cur == e.target.textContent) ? tab.splice(i, 1) : 1;
            });
            local.setItem('list', todos);
            e.target.remove();
        }
    }
});