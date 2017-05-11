---
layout: post
title: "How To Write Blogs In Markdown"
author: Sushovan Majhi
date: 2017-05-03 18:30 -0500 
language: English
categories: Tutorial Language
album: false
excerpt: Markdown is a type of Markup that is very easy to use. This markup language is widely used for writing blogs, webpages etc.
comments: true
---
## Highlighting
{% highlight ruby %}
def foo
 puts 'foo'
end  
{% endhighlight %}

## Font-size
------
Use `#` a number of times to adjust the font size of a line of text.
```
# This is too big
## This is big
### This is medium
#### This is small
##### This is smaller
###### This is too small
```
The above syntax will ouput the following:
# This is too big
## This is big
### This is medium
#### This is small
##### This is smaller
###### This is too small

## Italics
------
Use `*` or `_` to make italic style.
```
My name is *Sushovan* _Majhi_.
```
The above syntax will output the following:

My name is *Sushovan* _Majhi_.

## Bold
------
Use `**` or `__` for making a word bold.
```
My name is **Sushovan** __Majhi__.
```
The above syntax will output the following:

My name is **Sushovan** __Majhi__.

## Scratch
------
Use `~~` to scratch.
```
I did not like ~~this~~.
```
The above syntax will output the following:

I did not like ~~this food~~.

## List
------
Use `*`
```
* A
* B
* C
```
Outputs
1. A
* A1
* A2
2. B
3. C

## Link
------
```
[Here is Nita's blog](https://sushovan4.github.io/nita-blog)
```
will output

[Here is Nita's blog](https://sushovan4.github.io/nita-blog)

## Youtube Videos
------
Go to Youtube video, get the link for embedding and paste is as shown here.
```
<iframe width="95%" height="315" src="https://www.youtube.com/embed/w2dDgeA6BbU" frameborder="0" allowfullscreen></iframe>
```
<iframe width="95%" height="315" src="https://www.youtube.com/embed/w2dDgeA6BbU" frameborder="0" allowfullscreen></iframe>
