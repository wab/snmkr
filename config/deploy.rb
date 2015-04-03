set :application, 'snmkr'
set :repo_url, 'git@github.com:wab/snmkr.git'
#set :deploy_via, :copy #Comment déployer les fichiers.

# Branch options
# Prompts for the branch name (defaults to current branch)
#ask :branch, -> { `git rev-parse --abbrev-ref HEAD`.chomp }

# Hardcodes branch to always be master
# This could be overridden in a stage config file
set :branch, :master

set :deploy_to, -> { "/srv/www/#{fetch(:application)}" }

# Use :debug for more verbose output when troubleshooting
set :log_level, :debug

# Apache users with .htaccess files:
# it needs to be added to linked_files so it persists across deploys:
set :linked_files, fetch(:linked_files, []).push('.env', 'web/.htaccess')
set :linked_dirs, fetch(:linked_dirs, []).push(
  'web/app/uploads', 
  'web/app/plugins/gravityforms',
  'web/app/plugins/gravityformspaypal',
  'web/app/plugins/gravityformsstripe',
  'web/app/plugins/gravityformssignature',
  )

namespace :deploy do
  desc 'Restart application'
  task :restart do
    on roles(:app), in: :sequence, wait: 5 do
      # Your restart mechanism here, for example:
      # execute :service, :nginx, :reload
    end
  end
end

# The above restart task is not run by default
# Uncomment the following line to run it on deploys if needed
# after 'deploy:publishing', 'deploy:restart'

namespace :deploy do
  desc 'Update WordPress template root paths to point to the new release'
  task :update_option_paths do
    on roles(:app) do
      within fetch(:release_path) do
        if test :wp, :core, 'is-installed'
          [:stylesheet_root, :template_root].each do |option|
            # Only change the value if it's an absolute path
            # i.e. The relative path "/themes" must remain unchanged
            # Also, the option might not be set, in which case we leave it like that
            value = capture :wp, :option, :get, option, raise_on_non_zero_exit: false
            if value != '' && value != '/themes'
              execute :wp, :option, :set, option, fetch(:release_path).join('web/wp/wp-content/themes')
            end
          end
        end
      end
    end
  end
end

# The Sage theme by default does not check production assets into Git, so
# they are not deployed by Capistrano when using the Bedrock stack. The
# following will compile and deploy those assets. Copy this to the bottom of
# your config/deploy.rb file.
 
# Based on information from this thread:
# http://discourse.roots.io/t/capistrano-run-grunt-locally-and-upload-files/2062/7
# and specifically this gist from christhesoul:
# https://gist.github.com/christhesoul/3c38053971a7b786eff2
 
# First we need to set some variables so we know where things are. You should
# only have to modify :theme_path here, :local_app_path and :local_theme_path
# are set from that.

# copy local dist & somes plugins folder on remote
set :theme_path, Pathname.new("web/app/themes/#{fetch(:application)}")
set :shareplugins_path, Pathname.new("web/app/share-plugins")
set :local_app_path, Pathname.new(File.dirname(__FILE__)).join('../')
set :local_theme_path, fetch(:local_app_path).join(fetch(:theme_path))
set :local_shareplugins_path, fetch(:local_app_path).join(fetch(:shareplugins_path))
 
namespace :deploy do
  task :compile_assets do
    run_locally do
      within fetch(:local_theme_path) do
        execute :gulp, :build
      end
    end
  end
 
  task :copy_assets do
    invoke 'deploy:compile_assets'
 
    on roles(:web) do
      upload! fetch(:local_theme_path).join('dist').to_s, release_path.join(fetch(:theme_path)), recursive: true
    end

  end
end
 
before "deploy:updated", "deploy:copy_assets"

# namespace :deploy do

#   task :copy_share_plugins do
 
#     on roles(:web) do
#       upload! fetch(:local_shareplugins_path).to_s, release_path.join(fetch(:release_path)).join('app/plugins'), recursive: true
#     end

#   end
# end

# before "deploy:copy_assets", "deploy:copy_share_plugins"

