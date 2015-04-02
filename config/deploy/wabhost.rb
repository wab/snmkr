set :stage, :wab

# use your local repository as the source
set :repo_url, 'git@github.com:wab/snmkr.git'

# or use a hosted repository
#set :repository, "ssh://user@example.com/~/git/test.git"

server '92.243.4.233', user: 'wab', roles: %w{web app db}

set :deploy_via, :copy
set :copy_exclude, [".git", ".DS_Store"]
set :scm, :git
set :branch, "master"
# set this path to be correct on server
set :deploy_to, "/srv/d_wab2/www/#{fetch(:application)}.wabdesign.fr/htdocs"
#set :use_sudo, false
set :keep_releases, 2
set :git_shallow_clone, 1



fetch(:default_env).merge!(wp_env: :wab)


