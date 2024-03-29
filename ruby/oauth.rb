require 'rubygems'
require 'oauth'

# Change the following values to those provided on dev.twitter.com
# The consumer key identifies the application making the request.
# The access token identifies the user making the request.
consumer_key = OAuth::Consumer.new(
    "g9gWpcyaLglq67aSe6VoBAhjJ",
    "la5cAVtn20UL9xVv81poQcrmIHblG42oEYw0xuywH3BfGUhU2u")
access_token = OAuth::Token.new(
    "718616234472960000-tUzOC13DofGJFZ1JqSxhC94wsBwyo3W",
    "nF98XBPcojYWXSAEMQtuL1NRcHqfD8N2Np0k3IvLcJxyE")

# All requests will be sent to this server.
baseurl = "https://api.twitter.com"

# The verify credentials endpoint returns a 200 status if
# the request is signed correctly.
address = URI("#{baseurl}/1.1/account/verify_credentials.json")

# Set up Net::HTTP to use SSL, which is required by Twitter.
http = Net::HTTP.new address.host, address.port
http.use_ssl = true
http.verify_mode = OpenSSL::SSL::VERIFY_PEER

# Build the request and authorize it with OAuth.
request = Net::HTTP::Get.new address.request_uri
request.oauth! http, consumer_key, access_token

# Issue the request and return the response.
http.start
response = http.request request
puts "The response status was #{response.code}"

