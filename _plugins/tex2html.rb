module Jekyll
  class Tex2HTML < Converter
    safe true
    priority :low

    def matches(ext)
      ext =~ /^\.tex$/i
    end

    def output_ext(ext)
      ".html"
    end

    def convert(content)
      content.upcase
    end

  end
end
