<?php 

class OpenPGP_SignaturePacket_KeyServerPreferencesPacket extends OpenPGP_SignaturePacket_Subpacket {
  public $no_modify;

  function read() {
    $flags = ord($this->input);
    $this->no_modify = $flags & 0x80 == 0x80;
  }

  function body() {
    return chr($this->no_modify ? 0x80 : 0x00);
  }
}