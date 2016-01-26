import socket

HOST = "192.168.0.101"  # The remote host
PORT = 8081             # The same port as used by the server
s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
s.connect((HOST, PORT))
data = s.recv(2048)
s.close()

print(data);
data = "test";

with open('test.mp4','w') as f:
      f.write(data)