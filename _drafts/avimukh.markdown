---
permalink: rails-app-avimukh
title: Building a Rails App from Scratch
---
<ol style="border:1px solid grey">
  <h2 class="ui header">Table of Content</h2>
  <li><a href="#intro">Introduction</a></li>
  <li><a href="#prep">Preparation</a></li>
  <li><a href="#prep">Creating a new rails app</a></li>
  <li><a href="#prep">Hosting with AWS</a></li>
  <li><a href="#prep">Adding Styles</a></li>
  <li><a href="#prep">Design the Database</a></li>
  <li><a href="#prep">Conclusion</a></li>
</ol>

<div id="intro">
  <h1 class="ui header">Introduction</h1>
</div>

<div id="prep">
  <h1 class="ui header">Preparation</h1>
  In order to install Ruby on Rails, we first check our version of Ruby by typing
  the following in the terminal:

  {% highlight bash %}
  $ ruby -v
  {% endhighlight %}

  {% highlight bash %}
  $ rails -v
  {% endhighlight %}

</div>

<div>
  <h1 class="ui header">Creating a new Rails App</h1>
  Now, let's create a new app called "avimukh".
  {% highlight sh %}
  $ rails new avimukh --database=postgresql
  {% endhighlight %}
  By default, rails generates an app that uses SQL database. We are going to
  create the new app that uses Postgresl instead. 

  It takes about a minutes to generate a folder named avimukh in the directory
  where the command was triggered. In the process, rails installs the dependencies.
  It may ask for the superuser password.

  The Gemfile looks like this.
  <pre><code>
  {% highlight ruby %}
  source 'https://rubygems.org'
  git_source(:github) { |repo| "https://github.com/#{repo}.git" }

  ruby '2.5.1'

  gem 'rails', '~> 5.2.3'
  gem 'pg', '>= 0.18', '< 2.0'
  gem 'puma', '~> 3.11'
  gem 'sass-rails', '~> 5.0'
  gem 'uglifier', '>= 1.3.0'
  gem 'coffee-rails', '~> 4.2'
  gem 'turbolinks', '~> 5'
  gem 'jbuilder', '~> 2.5'
  gem 'bootsnap', '>= 1.1.0', require: false

  group :development, :test do
    gem 'byebug', platforms: [:mri, :mingw, :x64_mingw]
  end

  group :development do
    gem 'web-console', '>= 3.3.0'
    gem 'listen', '>= 3.0.5', '< 3.2'
    gem 'spring'
    gem 'spring-watcher-listen', '~> 2.0.0'
  end

  group :test do
    gem 'capybara', '>= 2.15'
    gem 'selenium-webdriver'
    gem 'chromedriver-helper'
  end

  gem 'tzinfo-data', platforms: [:mingw, :mswin, :x64_mingw, :jruby]
  {% endhighlight %}
  </code></pre>	

  We add a secret key to the file <span class="code">config/secrets.yml</span>.
  {% highlight yml %}
  secret_key_base: ENV['SECRET_KEY_BASE']
  {% endhighlight %}

  Let's install postgresql.
  {% highlight comamnd %}
  $ sudo apt update
  $ sudo apt install postgresql postgresql-contrib
  {% endhighlight %}

  Installing postgresql adds a new user named postgres. Let's login to the user.
  {% highlight comamnd %}
  $ sudo -i -u postgres
  {% endhighlight %}

  Enter psql add the superuser.
  {% highlight comamnd %}
  $ psql
  {% endhighlight %}

  {% highlight comamnd %}
  postgres@wenk-lab:~$ createuser --interactive
  {% endhighlight %}


  {% highlight comamnd %}
  postgres=# create role avimukh with login createdb password 'password1';
  CREATE ROLE
  {% endhighlight %}
  
  {% highlight comamnd %}
  postgres=# \q
  postgres@wenk-lab:~$
  {% endhighlight %}

  Let's add the login information to <span class="code">config/database.yml</span>
  {% highlight yml %}
  default: &default
    adapter: postgresql
    encoding: unicode
    # For details on connection pooling, see Rails configuration guide
    # http://guides.rubyonrails.org/configuring.html#database-pooling
    pool: <%= ENV.fetch("RAILS_MAX_THREADS") { 5 } %>

  development:
    <<: *default
    database: avimukh_development
    username: avimukh
    password: password1
  
  test:
    <<: *default
    database: avimukh_test
    username: avimukh
    password: password1

  # On Heroku and other platform providers, you may have a full connection URL
  # available as an environment variable. For example:
  #
  #   DATABASE_URL="postgres://myuser:mypass@localhost/somedatabase"
  #
  # You can use this database configuration with:
  #
  #   production:
  #     url: <%= ENV['DATABASE_URL'] %>
  #
  production:
    <<: *default
    database: avimukh_production
    username: avimukh
    password: <%= ENV['AVIMUKH_DATABASE_PASSWORD'] %>
  {% endhighlight %}

  Let's 
  {% highlight yml %}
  $ rails db:setup
  {% endhighlight %}
</div>
