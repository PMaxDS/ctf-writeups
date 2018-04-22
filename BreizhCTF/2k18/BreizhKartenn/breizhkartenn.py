#! /usr/bin/env python
#
# BreizhCTF/Programming/BreizhKartenn
#
# Pierre-Loup Tristant <pierre-loup@tristant.info>
# flag = BZHCTF{p4y_4773n710n_wh3n_l3c7ur3r_15_61v1n6_3x4m_h1n75}

import re
import telnetlib

CTF_IP = "148.60.87.243"
CTF_PORT = 9400
MSGLEN = 1024
YA = "YA! Me gwel %s :)"
NANN = "NANN! Me ne gwel ket %s :/"

def main():

    villes = {}
    with open("bzh3.csv") as f:
        content = f.readlines()

        for line in content:
            cp = line.split(";")[0]
            ville = line.split(";")[1]
            villes[cp] = ville

    tn = telnetlib.Telnet(CTF_IP, CTF_PORT)
    tn.read_until(b"Hit <ENTER> to start!")
    tn.write(b"\n")

    while(1):
        question = str(tn.read_until(b">>"))
        print(question)
        result = re.search("\[(\d+).*E (\d{5})", question)
        color_str = result[1]
        code = result[2]
        response = NANN if color_str == "91" else YA
        full = response % villes[code]
        print(full)
        tn.write(bytes(full, 'utf-8'))

if __name__ == '__main__':
    main()
