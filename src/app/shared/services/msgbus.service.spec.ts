import { TestBed } from '@angular/core/testing';

import { MsgbusService } from './msgbus.service';

describe('MsgbusService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: MsgbusService = TestBed.get(MsgbusService);
    expect(service).toBeTruthy();
  });
});
